<script>
import axios from 'axios';

const API_URL = 'http://localhost:8888/';

export default{
    
    data(){
        return{
            newTodo: '',

            todoList: [],
        }
    },
    methods:{

        formSubmit(e){

            e.preventDefault();

            const params = {params: { 'newTodo' : this.newTodo}};

            axios.get(API_URL + 'api-create-todo.php', params)
                .then(() => {
                    this.getAllData();
                });
        },
        getAllData(){

            axios.get(API_URL + 'api.php')
                .then(res => {

                    const data = res.data;

                    this.todoList = data;
                });
        }
    },  
    mounted (){
        this.getAllData();
    }
}
</script>

<template>
    <div class="container">
        <div class="d-flex flex-column align-items-center bg bg-dark p-3 rounded-3">
            <form @submit="formSubmit" class="pb-5">
                <input type="text" name="newTodo" v-model="newTodo">
                <input type="submit" value="CREATE">
            </form>
            <ul>
                <li v-for="(todoElem, ind) in todoList" :key="ind">
                    {{todoElem.text}}
                </li>
            </ul>
        </div>
    
    </div>

</template>

<style lang="scss" scoped>
@use '../styles/general.scss' as *;

</style>