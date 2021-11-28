const request = (type,data,path) => {
    return new Promise(
        resolve => {

            ajax({
                type,
                data,
                path,
               successCb : res => {
                resolve(res);
               }
            })

        }
    )

}


const list = data => request ('post',data,'http://localhost/11%e6%9c%8822%e6%97%a5/%e6%af%9b%e6%98%b1%e9%93%96/php/goodslist.php');
const login  = data => request ('post',data,'http://192.168.59.114/php/login.php');
const reg  = data => request ('post',data,'http://localhost/11%e6%9c%8825%e6%97%a5/%e6%af%9b%e6%98%b1%e9%93%96/php/login&register.php');
const cartList = data => request('post',data,'../php/cartlist.php');
const add = data => request('post',data,'../php/addCart.php');
const reduce = data => request('post',data,'../php/addCart.php');