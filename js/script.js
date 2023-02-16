//print invoice function
function printRecipt(){
  var prtContent = document.getElementById("print");
  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
}
const productCard = document.querySelectorAll('.card');
const productName=document.querySelectorAll('.productName');
const productPrice=document.querySelectorAll('.productPrice');
const tableWhite=document.querySelector('.table-white');


//find total payment and
//add to invoice
var total=document.querySelector('.total');
var totalPrice;
let isTotal = false;
for(let i=0;i<productCard.length;i++){

    productCard[i].addEventListener('click',()=>{
      
        //change background of the selected cards
        if(productCard[i].id == productCard.length - 1){
          productCard[i].style.backgroundColor="white";
        }else{
          productCard[i].style.backgroundColor="rgb(209,231,221)";
          productCard[productCard.length - 1].style.backgroundColor="rgb(209,231,221)";
        }
        
        if(productCard[i].id!=i){
          addToInvoice(i); 
        }else if(productCard[i].id == productCard.length -1){
          addToInvoice(i); 
        }else{
          // addToInvoice(i);
        }

    });
          
}

function addToInvoice(i){
    //add new item to invoice

    productCard[i].setAttribute('id',i);
    let tr = document.createElement('tr');
    tr.innerHTML = '<td class="itemName"></td><td class="itemInput"><input class="itemQty text-center border-0 outline-0" style="width:40px" type="number" value=1 min="0"/></td><td class="itemPrice">0</td>';
    tableWhite.appendChild(tr);

    var itemQty=document.querySelectorAll('.itemQty');
    var itemName=document.querySelectorAll('.itemName');
    var itemPrice=document.querySelectorAll('.itemPrice');
    var itemInput=document.querySelectorAll('.itemInput');

    itemName[itemName.length-1].innerHTML = productName[i].innerHTML;
    itemPrice[itemName.length-1].innerHTML = productPrice[i].innerHTML;
   

    //extend height of right side invoice
    if(itemName.length > 6){
      var prtContent = document.getElementById("print");
      prtContent.style.height='100%';
    }
   
    //find total
    totalPrice=0;
    let index;
    for(let i=0;i<itemName.length;i++){
      totalPrice+= parseInt(itemPrice[i].innerHTML) * itemQty[i].value ;
      index=i;
    }
    total.innerHTML = totalPrice +  " ៛";

    if(productName[i].innerHTML == "Total:"){
      itemName[itemName.length-1].remove();
      itemPrice[itemName.length-1].remove();
      itemInput[itemName.length-1].remove();
      itemQty[index].remove();
    }

    
    //delete item with 0 qty
    // for(let k=0;k<itemQty.length;k++){
    //   if(itemQty[k].value==0){
    //     itemName[k].remove();
    //     itemPrice[k].remove();
    //     itemInput[k].remove();
    //     itemQty[k].remove();
    //   }
    // }
  
    for(let k=0;k<itemQty.length;k++){
      if(itemQty[k].value==0){
        itemQty[k].style.color='red';
        itemName[k].style.color='red';
        itemPrice[k].style.color='red';
        itemPrice[k].style.textDecoration='line-through';
      }else{
        itemQty[k].style.color='';
        itemName[k].style.color='';
        itemPrice[k].style.color='';
        itemPrice[k].style.textDecoration='';
      }
    }
}
