<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="list-group">
                    <li v-for="vehicle, i in vehicles" class="list-group-item">
                        <div>
                            <span class="text-primary">{{ vehicle.title }}</span>
                        </div>
                        <div>
                            <router-link :to="{name: 'editVehicle', params: {id: vehicle.id}}" class="text-success">Редактировать</router-link>
                            <a class="text-danger" v-on:click="del(vehicle.id, i)">Удалить</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{name: 'createVehicle'}" class="btn btn-primary mt-2">Добавить транспорт</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                vehicles: []
            }
        },
        mounted() {
            axios.get('/api/vehicles')
                .then((response) => {
                    this.vehicles = response.data;
                })
                .catch((response) => {
                    console.log(response);
                    alert('Ошибка загрузки данных');
                });
        },
        methods: {
            del(id, i) {
                if (confirm('Подтвердите удаление')) {
                    axios.delete('/api/vehicles/' + id)
                        .then((response) => {
                            this.vehicles.splice(i, 1);
                            alert('Успешно удалено');
                            this.$router.push({path: '/vehicles'});
                        })
                        .catch((response) => {
                            console.log(response);
                            alert('Ошибка удаления');
                        });
                }
            }
        }
    }
</script>

<style scoped>
    a.text-danger {
        cursor: pointer;
    }
</style>
