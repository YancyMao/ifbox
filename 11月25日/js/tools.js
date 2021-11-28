


var $ =function(x){

    return document.getElementById(x)
}



//函数的作用：求和差积商
//第一个和第二个参数为数字，第三个参数为符号


function result(x, y, z) {
    switch (z) {
        case "+": {
            num = x + y;
            break;
        }

        case "-": {
            num = x - y;
            break;
        }

        case "*": {
            num = x * y;
            break;
        }

        case "/": {
            num = x / y;
            break;
        }


    }

    return num;
}





//函数的作用：生成三角形
//第一个参数为三角形高，第二个为组成三角形的内容

function triangle(a, b) {

    for (i = 0; i < a; i++) {

        for (j = 0; j <= i; j++) {

            document.write(b)



        }
        document.write("<br>")
    }

}

//函数的作用：判断是否闰年，返回true或false
//参数为年份
function isLeapyear(x) {

    return x % 4 === 0 && x % 100 !== 0 || x % 400 === 0;



}



//函数的作用：判断参数的数值是否为质数 返回true或false



function isPrimenumber(x) {
    for (i = 2; i < x; i++) {


        if (x % i === 0) {


            break;

        }



    }
    if (x === i) {
        return true;
    }
    else {
        return false;
    }
}


//函数的作用：输出一个99乘法表

function mclTable() {

    for (i = 1; i <= 9; i++) {

        for (j = 1; j <= i; j++) {
            document.write("&nbsp;&nbsp;"+j + "x" + i + "=" + j * i+"&nbsp;&nbsp;&nbsp;&nbsp;")
          
        }
        document.write("<br>")
    }



}



//随机数
//函数的作用：返回一个随机整数数，以参数x到y为范围

function rand(x,y){

    var num=parseInt(Math.random()*(y-x)+x);

    return num;

}

//判断年月日是否合法 合法输出true 不合法输出false
//第一个参数为年，第二个为月，第三个为日
function date(x,y,z){

    if(x>0&&x<10000&&x%1===0){

        if (y>0&&y<=12&&y%1===0){
            var a;
            if(y===1||y===3||y===5||y===7||y===8||y===10||y===12){

                a=31;

            }
            if(y===4||y===6||y===9||y===11){

                a=30;

            }
            if(y===2&&x%4===0&&x%100!==0||x%400===0){

                a=29;

            }
            else{
                a=29;
            }
            if(z>=1&&z<=a&&z%1===0){
                return true;
            }
            else{
                return false;
            }


        }
        else{

            return false;
        }

    }
    else{

        return false;
    }

}


//输入年月日，返回天数

function daySum(x,y,z){
    if(x>0&&x<10000&&x%1===0){

        if (y>0&&y<=12&&y%1===0){
            var a;
            if(y===1||y===3||y===5||y===7||y===8||y===10||y===12){

                a=31;

            }
            if(y===4||y===6||y===9||y===11){

                a=30;

            }
            if(y===2&&x%4===0&&x%100!==0||x%400===0){

                a=29;

            }
            else{
                a=29;
            }
            if(z>=1&&z<=a&&z%1===0){
                var sum=0;
                switch (y) {
                   
                    case 12 :{sum=sum+30}
                    case 11 :{sum=sum+31}
                    case 10 :{sum=sum+30}
                    case 9 :{sum=sum+31}
                    case 8 :{sum=sum+31}
                    case 7 :{sum=sum+30}
                    case 6 :{sum=sum+31}
                    case 5 :{sum=sum+30}
                    case 4 :{sum=sum+31}
                    case 3 :{sum=sum+a}
                    case 2 :{sum=sum+31}
                    case 1 :{sum=sum+z}
                    return sum;
                }
                
               
            }
            else{


                return "输入不正确";
            }


        }
        else{

            return "输入不正确";
        }

    }
    else{

        return "输入不正确";
    }




}



//翻译密文
//参数为输入数字
/*：
 每位数字都加上5,然后用除以10的余数代替该数字，再将第一位和第四位交换，
 第二位和第三位交换，请编写一个函数，传入原文，输出密文
 */


function translt (x){

    if(x>=1000&&x<10000){
        var a= parseInt(x/1000);
            b= parseInt(x%1000/100);
            c= parseInt(x%100/10);
            d= parseInt(x%10);

            a=a+5;
            b=b+5;
            c=c+5;
            d=d+5;
            a%=10;
            b%=10;
            c%=10;
            d%=10;
            a=String(a);
            b=String(b);
            c=String(c);
            d=String(d);

            var num =d+c+b+a;
            
            num=Number(num);

            return num;

    }

    else{


        return "请输入四位数"
    }



}
