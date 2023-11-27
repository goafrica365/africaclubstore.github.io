function getPromoCode() {
    fetch('/get-promo-code.php') // 修改為 PHP 腳本的路徑
        .then(response => response.json())
        .then(data => {
            if (data.promoCode) {
                var promoCodeButton = document.querySelector('.promo-code-button');
                promoCodeButton.innerText = data.promoCode;
            } else if (data.message) {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('無法獲取 Promo codes。');
        });
}
