var ap = 0;
var rp = 0; 
const checkbox = document.getElementById('chkbox');
let = url = "";
let urlper = "";
let select = "";
let proxytype = "";
let btn = "";
let proxy = "";
let progress = 0;
let textarea = document.getElementById('lista');
$('#form').submit(function(event){
  event.preventDefault();
  proxytype = document.getElementById('type').value;
  textarea.setAttribute('disabled',true);
    if(checkbox.checked){
       urlper = document.getElementById('urlPer').value;
       url = urlper;
       btn = "ckbox";
    }else{
      select = document.getElementById("url").value;
      url = select;
    }
    let lista = $('#lista').val().split('\n');
    let carregadas = lista.length;
    document.getElementById('car').textContent = carregadas;
    var x = 0;
    var ts = 0;
    lista.forEach(function(proxy,indice){
      if(proxy == ""){
        proxy = '000.00.00.00:0000';
      }
   		setTimeout(function(){
          $.ajax({
          url:'api.php',
          type: 'GET',
          data: 'api=' + proxy +"|"+ btn + "|" + url + "|" + proxytype,
        }).done(function(result){
          if(result.indexOf('APROVADA')>=0){
             proxy = JSON.parse(result);

             if(proxy.Time <= 2.99999){
               document.getElementById("proxylist").innerHTML += "<li class=' plive proxy'>IP: "  + proxy.Proxy + " Porta: " + proxy.Porta + " Tempo: <strong class='timegreen'> " + proxy.Time + "</strong> Cidade: " + proxy.Cidade + " Pais: " + proxy.Pais + " ISP: " + proxy.ISP + "</li><br>";
             }else{
               document.getElementById("proxylist").innerHTML += "<li class=' plive proxy'>IP: "  + proxy.Proxy + " Porta: " + proxy.Porta + " Tempo: <strong class='timered'> " + proxy.Time + "</strong> Cidade: " + proxy.Cidade + " Pais: " + proxy.Pais + " ISP: " + proxy.ISP + "</li><br>";
             }
             document.getElementById('copyLive').innerHTML += "<p>"+proxy.Proxy + ":" + proxy.Porta + "<p><br>";
             ap = ap + 1;
             document.getElementById("ap").textContent = ap;
          }else{
             rp = rp + 1;
             document.getElementById("rp").textContent = rp;            
          }
          te = ap + rp;
          to = (te * 100) / carregadas;
          document.getElementById('te').textContent = te;
          document.getElementById('progress').value = to;
        })
      },1000)
      x = x + 1;
    });
});

const btnCopy = document.querySelector('.copy');
function copy(event){
  event.preventDefault();
  const copyText = document.getElementById('copyLive').innerText;
  navigator.clipboard.writeText(copyText);
} 
btnCopy.addEventListener('click', copy);