function startup(){
    let emolumento = document.getElementById("emolumento");
    
    let modal =document.getElementById('btn');
        modal.click();

    let valor_emolumento = document.getElementById("valor_emolumento");
    let p_emolumento = document.getElementById("percentual");
    let r_emolumento = document.getElementById("emolumento_percentual");

    valor_emolumento.addEventListener('keydown', (e)=>{
        // console.log(e.target.value);s
        if(e.target.value){

            let valor =parseFloat(e.target.value);
            let p='';
            if(valor<=5000000){
                p= 0.95;
            }else if(valor> 5000000 && valor <=15000000){
                p=0.88;
            }else if(valor > 15000000 ){
                p=0.70;
            }
        
            let result=  valor * p;
            p_emolumento.innerHTML = `( ${p} )`;
            r_emolumento.value= result;

            emolumento.value= p*100;
            
        }else{
            p_emolumento.innerHTML=""
            r_emolumento.value=""
            emolumento.value=""
        }

    })
    
}