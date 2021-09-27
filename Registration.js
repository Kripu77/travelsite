var BufferKey="";
var StateString;

function TextInputValidate(key)
{
    var KeyPressed = key;

    if (!((KeyPressed >= 'a' && KeyPressed <= 'z') || (KeyPressed >= 'A' && KeyPressed <='Z') || (KeyPressed ==".") || (KeyPressed ==" ")|| (KeyPressed =="Backspace")))
    {
        document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Only alphabets allowed A-Z and a-z";
        setTimeout(ClearMessage, 1000);
        KeyPressed = false;
    }
    else
    {   
        if((BufferKey == KeyPressed) && ((KeyPressed == ".") || (KeyPressed ==" ")))
        {
            KeyPressed = false;
        }
        else
        {
            BufferKey = KeyPressed;
        }
    }

    return KeyPressed;
}

function NumInputValidate(key)
{
    var KeyPressed = key;

    if (document.getElementById("MobileNumber").value == "")
    {
        if ( !(KeyPressed >= '6' && KeyPressed <= '9'))
        {
            document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Mobile Number First Digit must be 6-9";
            setTimeout(ClearMessage, 1000);
            KeyPressed = false;
        }
        else
        {
            document.getElementById("MobileNumber").value = "+91";
        }
    }
    else if (document.getElementById("MobileNumber").value.length <13)
    {
        if (!((KeyPressed >= '0' && KeyPressed <= '9') || (KeyPressed == "Backspace")))
        {
            document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Only digits allowed 0-9";
            setTimeout(ClearMessage, 1000);
            KeyPressed = false;
        }
    }
    else
    {
        KeyPressed = false;
    }
    
    return KeyPressed;
}

function EmailInputValidate(key)
{
    var KeyPressed = key;

    if (!((KeyPressed >= 'a' && KeyPressed <= 'z') || (KeyPressed >= 'A' && KeyPressed <='Z') || (KeyPressed ==".") || ((KeyPressed >= '0' && KeyPressed <= '9'))|| (KeyPressed =="Backspace")
    || (KeyPressed =="@") || (KeyPressed =="-") || (KeyPressed =="_")))
    {
        document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Only alphabets allowed A-Z and a-z";
        setTimeout(ClearMessage, 1000);
        KeyPressed = false;
    }
    else
    {   
        if((BufferKey == KeyPressed) && ((KeyPressed == ".") || (KeyPressed ==" ") || (KeyPressed =="@") || (KeyPressed =="-") || (KeyPressed =="_")))
        {
            KeyPressed = false;
        }
        else
        {
            BufferKey = KeyPressed;
            document.getElementById("MessageBox").innerHTML = document.getElementById("MessageBox").innerHTML + KeyPressed;
        }
    }

    return KeyPressed;
}

function AlphaNumInputValidate(key)
{
    var KeyPressed = key;

    if (!((KeyPressed >= 'a' && KeyPressed <= 'z') || (KeyPressed >= 'A' && KeyPressed <='Z') || (KeyPressed ==".") || ((KeyPressed >= '0' && KeyPressed <= '9'))|| (KeyPressed =="Backspace")
    || (KeyPressed ==",") || (KeyPressed =="-") || (KeyPressed ==" ")))
    {
        document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Only alphabets allowed A-Z and a-z";
        setTimeout(ClearMessage, 1000);
        KeyPressed = false;
    }
    else
    {   
        if((BufferKey == KeyPressed) && ((KeyPressed == ".") || (KeyPressed ==" ")|| (KeyPressed ==",")))
        {
            KeyPressed = false;
        }
        else
        {
            BufferKey = KeyPressed;
        }
    }

    return KeyPressed;
}

function PinInputValidate(key)
{
    var KeyPressed = key;

    if (document.getElementById("Pincode").value == "")
    {
        if ( !(KeyPressed >= '1' && KeyPressed <= '9'))
        {
            document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Mobile Number First Digit must be 1-9";
            setTimeout(ClearMessage, 1000);
            KeyPressed = false;
        }
    }
    else if (document.getElementById("Pincode").value.length <6)
    {
        if (!((KeyPressed >= '0' && KeyPressed <= '9') || (KeyPressed == "Backspace")))
        {
            document.getElementById("MessageBox").innerHTML = "Invalid key pressed. Only digits allowed 0-9";
            setTimeout(ClearMessage, 1000);
            KeyPressed = false;
        }
    }
    else
    {
        KeyPressed = false;
    }
    
    return KeyPressed;
}


function ClearMessage()
{
    document.getElementById("MessageBox").innerHTML = "";
}


function ListExtractor()
{
    var HTTPRequest = new XMLHttpRequest();
    HTTPRequest.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            StateString = this.responseText;
            setTimeout(ListCreator,100);
        }
    };

    HTTPRequest.open("GET","http://www.shoppingcart.com/StateListFetcher.asp?", true);
    HTTPRequest.send();
}

function ListCreator()
{
    var StateList = StateString.split(",");
    var Count;

    for(Count=0;Count<StateList.length-1;Count++)
    {
        var ListOption;
        ListOption = document.createElement("option");
        ListOption.text = StateList[Count];
        document.getElementById("StateDropdown").add(ListOption);
    }

}

