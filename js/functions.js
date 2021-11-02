const baseURL = "https://bio.iglesias.dev.br"
// const baseURL = "http://localhost:3000"
const sitePrev = document.referrer
let siteName = ""

if (sitePrev) {
    siteName = sitePrev.split("//")[1]

}

siteData = {
    "baseUrl":  baseURL,
    "sitePrev":sitePrev,
    "siteName": siteName,
}

// console.log(siteData)

async function getInfo() {
    data = await fetch(baseURL + "/get-info.php", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(siteData)
        
    })
    data = await data.json()
    console.log(data)
    // console.log(siteData)
}

getInfo()

i = 0
txt = "Você já sabe onde me encontrar! =)"
speed = txt.length / 0.3;

function typeWriter() {
    if (i < txt.length) {
        document.getElementById("header").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }else{
        document.getElementById("cursor").style.display = "block"
    }
}

typeWriter()







