<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">'Dashboard'</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="TrainSelect">Train Selection</label>
                            <select id="TrainSelect" name="TrainSelect" @change="onTrainChange()" class="form-control" v-model="strain">
                                <option v-for="train in trains" :value="train.uuid">{{train.name}} - {{train.start_at}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="CarSelect">Car Selection</label>
                            <select id="CarSelect" name="CarSelect" @change="onCarChange()" class="form-control" v-model="scar">
                                <option v-for="car in cars" :value="car">{{car.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="SeatSelect">Seat Selection</label>
                            <select id="SeatSelect" name="SeatSelect" @change="onSeatChange()" class="form-control" v-model="sseat">
                                <option v-for="seat in seats" :value="seat.uuid">{{seat.name}} - Type: {{seat.type}} - Class: {{seat.rank}}</option>
                            </select>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservationModal">
                            Reserve selected seat
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModal" aria-hidden="true" v-if="show">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Reserve Seat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5>Seat is vacant</h5>
                                    <p>Price is {{price}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" @click="onSeatReservation()">Reserve Seat</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                trains: null,
                strain: null,
                cars: null,
                scar: null,
                seats: null,
                sseat: null,
                price: 0,
                show: false,
            }
        },
        mounted() {
            console.log('Component mounted.');
            axios
                .get('/trains')
                .then(response => (this.trains = response.data))
        },
        methods: {
            onTrainChange: function () {
                console.log(this.strain)
                axios
                    .get('/trains/' + this.strain)
                    .then(response => (this.cars = response.data.cars))
            },
            onCarChange: function () {
                console.log(this.scar)
                console.log(this.scar.seats)
                this.seats = this.scar.seats
            },
            onSeatChange: function () {
                console.log(this.sseat)
                var vm = this;
                axios
                    .get('/seat/check/' + this.sseat)
                    .then(function (response) {
                        if (response.data.vacant) {
                            vm.show = true;
                            vm.price = response.data.price
                        } else {
                            alert('occupied')
                        }
                    })
            },
            onSeatReservation: function () {
                console.log(this.sseat);
                axios
                    .post('/seat/reserve/', {uuid: this.sseat})
                    .then(function (response) {
                        if (response.data.success) {
                            alert('reserved')
                        } else if(response.data.message){
                            alert(response.data.message)
                        }else {
                            alert('error')
                        }
                    })
            },
            closeModal() {
                this.show = false;
                document.querySelector("body").classList.remove("overflow-hidden");
            },
            openModal() {
                this.show = true;
                document.querySelector("body").classList.add("overflow-hidden");
            }
        }
    }
</script>
