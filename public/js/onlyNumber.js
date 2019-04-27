/**
 *カートへの商品追加では半角数字のみ入力できる
 **/
function checkForm($this)
{
    var str=$this.value;
    while(str.match(/[^0-9\d\-]/))
    {
        str=str.replace(/[^0-9\d\-]/,"");
    }
    $this.value=str;
}
