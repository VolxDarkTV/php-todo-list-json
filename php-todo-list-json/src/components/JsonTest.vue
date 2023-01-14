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
    methods: {
        getAllData(){
            
            axios.get(API_URL + 'api.php')
            .then(res => {
                
                const data = res.data;
                
                this.todoList = data;
            });
        },
        formSubmit(e){

            e.preventDefault();

            const params = {
                params: { 
                    'newTodo' : this.newTodo
                }};

            axios.get(API_URL + 'api-create-todo.php', params)
                .then(() => {
                    this.newTodo = "";
                    this.getAllData();
                });
        },

        // collegamento al file php per la funzione delete task
        clickDelete(index){
            
            const params = {
                'index': index,
            }

            axios.get(API_URL + 'api-delete-todo.php', { params })
                .then(() =>{
                    this.getAllData();
                })
            
            
        },
    },  
    mounted (){
        this.getAllData();
    }
}
</script>

<template>

    <div class="container">

        <div class="d-flex flex-column align-items-center bg bg-dark p-3 rounded-3">
            <form @submit="formSubmit" class="mb-3">
                <input type="text" name="newTodo" v-model="newTodo">
                <input type="submit" value="CREATE">
            </form>
            <div class="my_todo_ul_list p-5">
                <ul class="d-flex flex-column gap-2">
                    <li class="my_todo d-flex justify-content-between rounded-pill border border-white p-3" v-for="(todoElem, ind) in todoList" :key="ind">
    
                        <span class="my_text d-flex align-items-center pe-3">{{todoElem.text}}</span>
    
                        <span @click="clickDelete(ind)" class="my_close d-flex justify-content-center align-items-center">X</span>
                        
                    </li>
                </ul>
            </div>
        </div>
    
    </div>

</template>

<style lang="scss" scoped>
@use '../styles/general.scss' as *;
.my_todo_ul_list{
    max-height: 300px;
    overflow-y: auto;
}
.my_todo{
    min-width: 100px;
    color: white;
}
.my_todo:hover{
    background-color: #2d3136;
}
.my_close{
    width: 40px;
    height: 40px;
    border: solid red 1px;
    border-radius: 50%;
    cursor: pointer;
}
.my_close:hover{
    background-color: #2d3136;
    color: red;
}
.my_completed_task{
    text-decoration: line-through;
}
</style>