(function () {

    let countDownModule = document.getElementById("countdown");
    
    if(countDownModule) {

        let countDownValue = admin_url.startCountDown
        const second = 1000
        const minute = second * 60
        const hour = minute * 60
        const day = hour * 24

        let today = new Date()
        let dd = String(today.getDate()).padStart(2, "0")
        let mm = String(today.getMonth() + 1).padStart(2, "0")
        let yyyy = today.getFullYear()
        let birthday = countDownValue

        today = mm + "/" + dd + "/" + yyyy;

        const countDown = new Date(birthday).getTime(),

        x = setInterval(function () {
            const now = new Date().getTime(),
                distance = countDown - now;

            (document.getElementById("days").innerText = Math.floor(
                distance / day
            )),
            (document.getElementById("hours").innerText = Math.floor(
                (distance % day) / hour
            )),
            (document.getElementById("minutes").innerText = Math.floor(
                (distance % hour) / minute
            )),
            (document.getElementById("seconds").innerText = Math.floor(
                (distance % minute) / second
            ));

            //do something later when date is reached
            if (distance < 0) {
                countDownModule.style.display = "none";
                clearInterval(x);
            }
        }, 0);
    }

})();