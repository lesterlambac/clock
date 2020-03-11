<template>
    <div>
        <div class="clock-background">
            <div class="clock-modal">
                <div class="clock">
                    <div class="hand hours" :class="hoursClass"></div>
                    <div class="hand minutes" :class="minutesClass"></div>
                    <div class="hand seconds" :class="secondsClass"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            secondsClass: '',
            minutesClass: '',
            hoursClass: '',
        }
    },
    methods: {
        setTime(){
            this.seconds();
            this.minutes();
            this.hours();
        },
        seconds() {
            const seconds =  this.$el.querySelector('.seconds');
            const getSecondsNow = (((new Date()).getSeconds() / 60) * 360) + 90;
            if(getSecondsNow == 90) {
                this.secondsClass = 'no-transition';
            }else {
                this.secondsClass = '';
            }
            seconds.style.transform = `rotate(${getSecondsNow}deg)`
        },

        minutes() {
            const minutes =  this.$el.querySelector('.minutes');
            const getMinutes =  (((new Date()).getMinutes() / 60) * 360) + 90;
            if(getMinutes == 90) {
                this.minutesClass = 'no-transition';
            }else {
                this.minutesClass = '';
            }
            minutes.style.transform = `rotate(${getMinutes}deg)`
        },

        hours() {
            const hours =  this.$el.querySelector('.hours');
            const getHours = (((new Date()).getHours() / 12) * 360) + 90;
            if(getHours == 90) {
                this.hoursClass = 'no-transition';
            } else {
                 this.hoursClass = '';
            }
            hours.style.transform = `rotate(${getHours}deg)`
        },
    },

    mounted() {
        setInterval(this.setTime.bind(this), 1000);
    }
}
</script>

<style>
.clock-background {
    background-size: cover;
    margin: 0;
    display: flex;
    flex: 1;
    min-height: 100vh;
    align-items: center;
}

.clock-modal {
    position: relative;
    width: 100%;
    height: 100%;
}

.clock {
    width: 30rem;
    height: 30rem;
    border: 20px solid lightgrey;
    border-radius: 50%;
    margin: 50px auto;
    position: relative;
    padding: 2rem;
    box-shadow:
    0 0 0 4px rgba(0,0,0,0.1),
    inset 0 0 0 3px white,
    inset 0 0 10px black,
    0 0 10px rgba(0,0,0,0.2);
}

.hand {
    width: 50%;
    height: 6px;
    background: black;
    position: absolute;
    top: calc(50% - 3px);
    left: 0;
    right: 0;
    transform-origin: 100%;
    transform: rotate(90deg);
    transition-timing-function: cubic-bezier(.4,2.08,.55,.44);
    transition: all 0.5s;
}

.hours {
    width: 35%;
    left: 15%;
    z-index: 3;
}

.minutes {
    width: 45%;
    left: 5%;
    z-index: 2;
    background-color: darkgray;
}

.seconds {
    z-index: 1;
    background-color: darkred;
}

.no-transition {
  transition: none;
}

</style>