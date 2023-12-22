import './bootstrap';
import.meta.glob([
    '../images/**',
])

window.onload = setShareLinks;
const pageUrl = encodeURIComponent(document.URL);
const pageTitle = encodeURIComponent(document.title);

function setShareLinks() {
    const buttons = document.querySelectorAll('button.share__link')
    buttons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            let url = null;

            if (button.classList.contains('share__link--facebook')) {
                url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                socialWindow(url, 570, 570);
            }

            if (button.classList.contains('share__link--twitter')) {
                url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + pageTitle;
                socialWindow(url, 570, 300);
            }


            if (button.classList.contains('share__link--whatsapp')) {
                url = "whatsapp://send?text=" + pageTitle + "%20" + pageUrl;
                socialWindow(url, 570, 450);
            }

            if (button.classList.contains('share__link--mail')) {
                url = "mailto:?subject=%22" + pageTitle + "%22&body=Read%20the%20article%20%22" + pageTitle + "%22%20on%20" + pageUrl;
                socialWindow(url, 570, 450);
            }
        }, false)
    })
}

function socialWindow(url, width, height) {
    const left = (screen.width - width) / 2;
    const top = (screen.height - height) / 2;
    const params = "menubar=no,toolbar=no,status=no,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
    window.open(url,"",params);
}
