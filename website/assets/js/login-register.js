function error(err) 
{
    window.alert('reCAPTCHA 驗證失敗');
}

function registerVerifyCallback()
{
    document.getElementById("register").disabled = false;
}

function loginVerifyCallback()
{
    document.getElementById("login").disabled = false;
}

