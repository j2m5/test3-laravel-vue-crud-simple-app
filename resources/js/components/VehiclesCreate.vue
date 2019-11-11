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
                        <option disabled selected>Выберите водителя</option>
                        <option v-for="driver in drivers" v-bind:value="driver.id">{{ driver.firstname }} {{ driver.lastname }}</option>
                    </select>
                    <button class="btn btn-primary mt-2" type="submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                drivers: [],
                vehicle: {
                    type: '',
                    title: '',
                    driver_id: '',
                    status: ''
                }
            }
        },
        mounted() {
            axios.get('/api/vehicles/create')
                .then((response) => {
                    this.drivers = response.data;
                })
                .catch((response) => {
                    console.log(response);
                    alert('Ошибка загрузки данных');
                });
        },
        methods: {
            save() {
                axios.post('/api/vehicles', this.vehicle)
                    .then((response) => {
                        this.$router.push({path: '/vehicles'});
                    })
                    .catch((response) => {
                        console.log(response);
                        alert('Ошибка сохранения данных');
                    });
            }
        }
    }
</script>

<style scoped>

</style>
