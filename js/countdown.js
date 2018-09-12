class CountDown {

    constructor(elem, date) {

        this.date = date;
        this.count = elem.querySelector(".count");

        let now = Date.now();
        let diffMs = date.getTime() - now;

        if (diffMs <= 0) {
            // already ended
            this.count.innerHTML = "EXPIRE";
            return;
        }

        let day = Math.floor(diffMs / 86400000);
        diffMs -= day * 86400000; // take off day(s)

        let hour = Math.floor(diffMs / 3600000);
        diffMs -= hour * 3600000; // take off hour(s)
        
        if (day > 0) {

            // the countdown is longer than a day => no dynamique countdown
            this.count.innerHTML = day + "j " + hour + "h";

        } else {

            let minute = Math.floor(diffMs / 60000);
            diffMs -= minute * 60000; // take off minute(s)

            let second = Math.floor(diffMs / 1000);

            this.time = {
                hour: hour,
                minute: minute,
                second: second
            };

            this.count.innerHTML = hour + "h " + minute + "m " + second + "s"; // init display

            this.interval = setInterval((CountDown) => {

                CountDown.time.second--; // every second we discrease the countdown of a second

                if (CountDown.time.hour === 0 && CountDown.time.minute === 0 && CountDown.time.second === -1) {
                    
                    // end of timer
                    CountDown.count.innerHTML = "Fin des inscriptions";
                    clearInterval(CountDown.interval);

                } else {

                    if (CountDown.time.second === -1) {
                        CountDown.time.second = 59;
                        CountDown.time.minute--;
                    }

                    if (CountDown.time.minute === -1) {
                        CountDown.time.minute = 59;
                        CountDown.time.hour--;
                    }

                    CountDown.count.innerHTML = CountDown.time.hour + "h " + CountDown.time.minute + "m " + CountDown.time.second + "s"; // refresh display
                }

            }, 1000, this);

        }

    }

    static load() {
        document.querySelectorAll(".countdown").forEach(elem => {
            let date = elem.querySelector(".date").innerHTML;
            let dateObj = new Date(date);
            elem.countdown = new CountDown(elem, dateObj);
        })
    }

}