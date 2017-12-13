/*
    function dinamico() {

        $("#Dingreso").empty();
        document.getElementById('Cant').value=document.getElementById('cantidad').value;
        for (var i =1; i <document.getElementById('cantidad').value; i++) {

            var tr=document.createElement('tr');

            var td3=document.createElement('td');
            tr.appendChild(td3);

            var text= document.createElement('h4');
            text.innerHTML = i+1;
            td3.appendChild(text);



            var td=document.createElement('td');
            tr.appendChild(td);     

            var CodProd = document.createElement('input');
            CodProd.setAttribute('class','form-control ');
            CodProd.setAttribute('type','text');
            CodProd.setAttribute('pattern','[A-Za-z0-9]+');
            CodProd.setAttribute('id','ProdVenta'+i);
            CodProd.setAttribute('name','CodigoDelProducto'+i);
            td.appendChild(CodProd);

            var td1=document.createElement('td');
            tr.appendChild(td1);

            var talla = document.createElement('input')
            talla.setAttribute('class','form-control');
            talla.setAttribute('type','number');
            talla.setAttribute('pattern','[0-9]+');
            talla.setAttribute('id','TallaVenta'+i);
            talla.setAttribute('name','TallaDelProducto'+i);
            td1.appendChild(talla);

            var td2=document.createElement('td');
            tr.appendChild(td2);

            var PrecioVenta = document.createElement('input')
            PrecioVenta.setAttribute('class','form-control');
            PrecioVenta.setAttribute('type','number');
            PrecioVenta.setAttribute('pattern','[0-9]+');
            PrecioVenta.setAttribute('id','PrecioVenta'+i);
            PrecioVenta.setAttribute('name','PrecioDelProducto'+i);
            td2.appendChild(PrecioVenta);
            
            var tablebody = document.getElementById("tbody");
            tablebody.appendChild(tr);
        }
    }    
*/

    function dinamico() {

        $("#Dingreso").empty();
        document.getElementById('Cant').value=document.getElementById('cantidad').value;
        for (var i =1; i <document.getElementById('cantidad').value; i++) {

            var tr=document.createElement('tr');

            var td3=document.createElement('td');
            tr.appendChild(td3);

            var text= document.createElement('h4');
            text.innerHTML = i+1;
            td3.appendChild(text);



            var td=document.createElement('td');
            tr.appendChild(td);     

            var selectC1=document.createElement('select');
            td.appendChild(selectC1);
            selectC1.setAttribute('id','Codigo'+i);
            selectC1.setAttribute('name','CodigoDelProducto'+i);
            selectC1.setAttribute('class','form-control');
            selectC1.setAttribute('onchange','cuadrar(this.value,'+i+')');

           var selectC =document.getElementById('Codigo0');
            for(var j=1; j<selectC.childNodes.length;j++)
            {
                var hijo=selectC.childNodes[j].cloneNode();
                hijo.innerHTML = selectC.childNodes[j].innerHTML;
                selectC1.appendChild(hijo); 
            }

            var td2=document.createElement('td');
            tr.appendChild(td2);

            var selectT1=document.createElement('select');
            td2.appendChild(selectT1);
            selectT1.setAttribute('id','Talla'+i);
            selectT1.setAttribute('name','TallaDelProducto'+i);
            selectT1.setAttribute('class','form-control');
            selectT1.setAttribute('readonly','readonly');

           var selectT =document.getElementById('Talla0');
            for(var j=1; j<selectT.childNodes.length;j++)
            {
                var hijo=selectT.childNodes[j].cloneNode();
                hijo.innerHTML = selectT.childNodes[j].innerHTML;
                selectT1.appendChild(hijo);    
            }


            var td4=document.createElement('td');
            tr.appendChild(td4);

            var selectP1=document.createElement('select');
            td4.appendChild(selectP1);
            selectP1.setAttribute('id','Precio'+i);
            selectP1.setAttribute('name','PrecioDelProducto'+i);
            selectP1.setAttribute('class','form-control');
            selectP1.setAttribute('readonly','readonly');

           var selectP =document.getElementById('Precio0');

            for(var j=1; j<selectP.childNodes.length;j++)
            {
                var hijo=selectP.childNodes[j].cloneNode();
                hijo.innerHTML = selectP.childNodes[j].innerHTML;
                selectP1.appendChild(hijo);    
            }            
            var tablebody = document.getElementById("Dingreso");
            tablebody.appendChild(tr);
        }
    }    


function cuadrar(codigo,identificador){
    var cod= document.getElementById('Codigo'+identificador);
    var pos=cod.selectedIndex;

    var tall=document.getElementById('Talla'+identificador);
    tall.selectedIndex=pos;

    var prec=document.getElementById('Precio'+identificador);
    prec.selectedIndex=pos;        
 }