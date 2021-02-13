
//function for print specific div

window.printDiv = function (divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}


window.wOpen = function (url, name) {
    var windowFeatures = "width=800,height=600";
    window.open(url, name, [windowFeatures]);
}