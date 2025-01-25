const sociallink = [
    {
        url : "https://linkedin.com/in/darwishzain",
        icon : "fa fa-linkedin",
        id : "linkedin"
    },
    {
        url : "https://github.com/darwishzain",
        icon : "fa fa-github",
        id : "github" 
    },
    {
        url : "https://facebook.com/darwishzainstd",
        icon : "fa-brands fa-facebook",
        id : "facebook"
    },
    {
        url : "https://instagram.com/darwishzainstd",
        icon : "fa-brands fa-instagram",
        id : "instagram"
    },
    {
        url : "https://tiktok.com/@darwishzainstd",
        icon : "fa-brands fa-tiktok",
        id : "tiktok"
    },
    {
        url : "mailto:darwishzainstudio@gmail.com",
        icon : "fa fa-envelope",
        id : "email"
    }
    
];

const socialcontainer = document.getElementById("socialmediacontainer");
sociallink.forEach(link => {
    const anchor = document.createElement("a");
    anchor.href = link.url;
    anchor.target = "_blank";
    anchor.classList.add("social-icon");
    anchor.id = link.id;
    const icon = document.createElement("i");
    icon.classList.add(...link.icon.split(" "));
    anchor.appendChild(icon);
    socialcontainer.appendChild(anchor);
})
console.log("debug");
