const hello_arr = [
    "반가워요! 이름을 입력해 주세요!",
    "환영합니다! 이름을 입력해 주세요!",
    "당신의 멋진 이름을 입력해 주세요!",
    "안녕하세요! 이름을 입력해 주세요!",
    "찾아주셔서 감사합니다! 이름을 입력해 주세요!"
];

$(function () {
    loginProcess(false);

    $(document).ajaxStart(function() {
        var str = "<div class='container'><div class='box'><div class='clock'></div></div></div>";
        $("body").html(str);
        $(".container").fadeIn(1500);
    });
});
1
async function loginProcess(flag) {
    if (flag) {
        $(".login-wrap").css("display", "none");
    }

    var num = Math.floor((Math.random() * 5));
    $(".swal2-title").css("font-size", "12.5em");

    var {value : name} = await Swal.fire({
        title: hello_arr[num],
        input: "text",
        inputVlue: "",
        showCancelButton: false,
        inputValidator: (value) => {
            if (!value) {
                return "이름을 입력해주세요!";
            }
        }
    });

    if (name) {
        loginAjax(name);
    } else {
        loginFail();
    }
}

function loginAjax(name) {

    if (name == '') {
        loginFail();
        return false;
    }
    $.ajax({
        type: "POST",
        url: "../ajax/login.php",
        async: true,
        dataType: "JSON",
        data: {
            "name": name,
        },
        success: function (res) {
            console.log(res);
            Swal.fire({
                title: res.title,
                text: res.msg,
                icon: res.icon,                
            }).then(() => {
                if (res.status) {
                    $(".container").css("display", "none");
                    location.replace('./main.php');
                } else {
                    loginFail();
                }
            });
        }
    });
}

function loginFail() {
    var str = "<div class='login-wrap'><p class='error_msg'>로그인에 실패하셨나요?</p><p class='error_icon'><i class='far fa-times-circle'></i></p><span class='re_login' onclick='loginProcess(true)'>재시도</span></div>";
    $("body").html(str);
}