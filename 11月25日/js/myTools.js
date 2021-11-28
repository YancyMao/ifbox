


//自用弹窗
const myAlert = text => {
    const oD = document.createElement('div');
    const w = text.length*14;
    oD.style.cssText=`
        position: fixed;
        width: ${w}px;
        height: 20px;
        padding: 10px 20px;
        top: -50px;
        left: 0;
        right: 0;
        margin: 0 auto;
        background-color: #DBEF65;
        border: 1px solid #dfdfdf;
        display: block;
        transition: .3s;
        border-radius: 3px;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        `
        oD.innerHTML=text;
        document.body.appendChild(oD);
        setTimeout(
        () => {
            oD.style.top = 0;
            setTimeout(
                () => {
                    oD.style.top = - 50 + 'px';
                    setTimeout(() => {
                        oD.style.display = 'none';
                        oD.remove();
                    },
                        1000)
                },
                1500
            )
        },
        100
    )
}



const $ = ele => document.querySelector(ele);



const ajax = obj => {
    const {
       type='get',
       dataType='json',
       path,
       data={},
        successCb

    }= obj;
    let n='';
    for(let key in data){

        n+=`${key}=${data[key]}&`
    }
    n=n.substring(0,n.length-1)
    const x=new XMLHttpRequest()
    if(type==='get'){
        x.open('get',path + '?' +n,true);
        x.send();
    }
    else{
        x.open('post',path,true);
        x.setRequestHeader('content-Type','application/x-www-form-urlencoded')
        x.send(n);
    }
    x.onreadystatechange= () => {

        if(x.readyState===4&&x.status===200){

            let res=x.responseText;
            console.log(res)
            if(dataType==='json'){
                res=JSON.parse(res)
            }
            successCb(res);
        }
    }
}



















