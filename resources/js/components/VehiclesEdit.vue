<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <router-link to="/vehicles" class="text-success">&lt;&lt; Вернуться к списку</router-link>
                <form v-on:submit.prevent="save()">
                    <input class="form-control mt-2" type="text" v-model="vehicle.type" placeholder="Тип">
                    <input class="form-control mt-2" type="text" v-model="vehicle.title" placeholder="Название">
                    <input class="form-control mt-2" type="text" v-model="vehicle.status" placeholder="Статус">
                    <select class="form-control mt-2" v-model="vehicle.driver_id">
                        <option v-for="driver in drivers" v-bind:value="driver.id">{{ driver.firstname }} {{ driver.lastname }}</option>
                    </select>
                    <button class="btn btn-primary mt-2">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: function () {
            return {
                drivers: [],
                vehicleId: null,
                vehicle: {
                    type: '',
                    title: '',
                    driver_id: '',
                    status: ''
                }
            }
        },
        mounted() {
            let id = this.$route.params.id;
            this.vehicleId = id;
            axios.get('/api/vehicles/' + id)
                .then((response) => {
                    this.vehicle = response.data;
                })
                .catch((response) => {
                    console.log(response);
                    alert('Ошибка загрузки данных');
                });
            axios.get('/api/vehicles/create')
                .then((response) => {
                    this.drivers = response.data;
                })
                .catch((response) => {
                    console.log(response);
                    alert('Не удалось загрузить список водителей');
                });
        },
        methods: {
            save() {
                let newVehicle = this.vehicle;
                axios.patch('/api/vehicles/' + this.vehicleId, newVehicle)
                    .then((response) => {
                        this.$router.replace('/vehicles')
                    })
                    .catch((response) => {
                        console.log(response);
                        alert('Ошибка загрузки данных');
                    });
            }
        }
    }
</script>

<style scoped>

</style>
