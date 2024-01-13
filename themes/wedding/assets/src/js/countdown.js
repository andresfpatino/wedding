import confetti from 'canvas-confetti';

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

            if (distance < 0) {
                document.getElementById("days").innerText = 0;
                document.getElementById("hours").innerText = 0;
                document.getElementById("minutes").innerText = 0;
                document.getElementById("seconds").innerText = 0;

                document.getElementsByClassName("countdown--message")[0].style.display = "block";

                var heart = confetti.shapeFromPath({
                    path: 'M167 72c19,-38 37,-56 75,-56 42,0 76,33 76,75 0,76 -76,151 -151,227 -76,-76 -151,-151 -151,-227 0,-42 33,-75 75,-75 38,0 57,18 76,56z',
                    matrix: [0.05, 0, 0, 0.05, -5.566666666666666, -5.533333333333333]
                  });

                let confettiInterval = setInterval(function() {
                    confetti({
                        particleCount: 100,
                        startVelocity: 30,
                        spread: 360,
                        shapes: [heart],
                        colors: ['#4e6c8a', '#8fa99d', '#B7797A']
                    });
                }, 2000); // Dispara confetti cada segundo

                // Detiene el confetti después de 5 segundos
                setTimeout(function() {
                    clearInterval(confettiInterval);
                }, 8000);

                clearInterval(x);
            } else {
                document.getElementById("days").innerText = Math.floor(
                    distance / day
                );
                document.getElementById("hours").innerText = Math.floor(
                    (distance % day) / hour
                );
                document.getElementById("minutes").innerText = Math.floor(
                    (distance % hour) / minute
                );
                document.getElementById("seconds").innerText = Math.floor(
                    (distance % minute) / second
                );
            }
        }, 0);
    }

})();