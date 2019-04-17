<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">My tasks</div>
                    
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   v-model="task.name"
                                   @keydown.enter="create">
                            <span class="input-group-btn">
                                <button class="btn btn-success" @click="create">Добавить задачу</button>
                            </span>
                        </div>
    
                        <div class="tasks-list">
                            <h5>Задач в работе: {{ remainingTasks() }} из {{ tasks.length }}</h5>
                            <ul class="list-unstyled">
                                <li v-for="task in tasks" :key="task.id" :class="{ done: task.completed }">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="task.completed" @click="done(task)"> {{ task.name }}
                                        </label>
                                        <div class="pull-right">
                                            <a href="#" @click.prevent="remove(task)">x</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h5>Выполнено: {{ completedTasks() }}</h5>
                            <ul class="list-unstyled">
                                <li v-for="task in tasks" :key="task.id" :class="{ done: !task.completed }">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="task.completed" @click="done(task)"> {{ task.name }}
                                        </label>
                                        <div class="pull-right">
                                            <a href="#" @click.prevent="remove(task)">x</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
        data () {
            return {
                tasks: [],
                task: {
                    name: ''
                }
            }
        },
        methods: {
            remainingTasks () {
                return this.tasks.filter(task => { return !task.completed }).length
            },
            completedTasks () {
                return this.tasks.filter(task => { return task.completed }).length
            },
            fetchData () {
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            create () {
                axios.post('/api/tasks', this.task)
                    .then((res) => {
                        this.tasks.unshift(res.data)
                        this.task.name = ''
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            done (task) {
                axios.put(`/api/tasks/${task.id}`, {
                    completed: !task.completed
                })
                    .then((res) => {
                        console.log('task updated')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            remove (task) {
                axios.delete(`/api/tasks/${task.id}`)
                    .then((res) => {
                        const taskIndex = this.tasks.indexOf(task)
                        this.tasks.splice(taskIndex, 1)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
