const background_arr = [
    "linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)",                    // Kind Steel
    //"linear-gradient(to top, #bdc2e8 0%, #bdc2e8 1%, #e6dee9 60%)",        // Marble Wall
    "linear-gradient(to top, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%)"         // Confident Cloud
];

$(function() {
    pageLoading();
});

function pageLoading() {
    var num = Math.floor((Math.random() * background_arr.length));
    console.log(num);
    $("#background-color").css("background-image", background_arr[num]).fadeIn(1000);
}