<template>
    <div class="card my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-7">
                    <img src="../../../public/img/register.jpg" alt="">
                </div>
                <div class="col-md-5 px-5">
                    <div class="text-center">
                        <img src="../../../public/img/logo.png" alt="logo" style="width: 60px;" class="pt-3">
                        <h3 class="my-4">Create New Account</h3>
                    </div>
                    <div class="py-2"></div>
                    <ul class="text-danger" v-if="errors.length > 0">
                        <li v-for="error in errors" :key="errors.indexOf(error)">
                            {{error}}
                        </li>
                    </ul>
                    <form>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" v-model="name" id="name" class="form-control" placeholder="Enter your user name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" v-model="email" id="email" class="form-control" placeholder="Enter your email address">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" v-model="password" id="password" class="form-control"  :class="!passwordMatched && 'is-invalid'" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" v-model="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter your password again">
                        </div>

                        <button type="button" class="uk-button-primary px-4 py-2" :disabled="!formIsValid" @click="attemptRegister()">
                            <div class="uk-text-primary" v-if="isLoading">
                                <span class="uk-margin-small-right">
                                    <img src="img/loader.svg" alt="Loader" width="22" height="22" data-uk-svg>
                                </span>
                            </div>
                            <span v-else>Submit</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                passwordMatched: true,
                isLoading: false,
                errors: []
            }
        },

        methods: {
            emailIsValid(){
                if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this.email))
                {
                    return true;
                }
                else{
                    return false;
                }
            },

            passwordConfirmation(){
                if(this.password != this.password_confirmation){
                    this.passwordMatched = false;
                    return false;
                }
                else{
                    this.passwordMatched = true;
                    return true;
                }
            },

            attemptRegister(){
                this.isLoading = true;
                this.errors = [];

                axios.post('/register',{
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }).then(res => {
                    if(res.status == 200 && res.data.status == 'success'){
                        window.location.href = '/';
                    }
                }).catch(error => {
                    this.isLoading = false;

                    if(error.response.status == 422){
                        let err = error.response.data.errors;

                        for (const [key, value] of Object.entries(err)) {
                            value.map(data => {
                                this.errors.push(data);
                            })
                        }
                    }
                    else{
                        this.errors.push("Somthing went wrong. Please try again");
                    }
                });
            },
        },

        computed: {
            formIsValid(){
                return this.name && this.emailIsValid() && this.password && this.passwordConfirmation() && !this.isLoading
            }
        }
    }
</script>

<style scoped>

</style>