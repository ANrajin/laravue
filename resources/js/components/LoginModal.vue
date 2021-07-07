<template>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-5">
                    <div class="text-center">
                        <img src="../../../public/img/logo.png" alt="logo" width="80"/>
                        <h4 class="uk-h4">Please Login To Start your Session</h4>
                    </div>
                    <div class="py-2"></div>
                    <ul class="text-danger" v-if="errors.length > 0">
                        <li v-for="error in errors" :key="errors.indexOf(error)">
                            {{error}}
                        </li>
                    </ul>
                    <form>
                        <div class="form-group py-2">
                            <label for="email">Your Email Address</label>
                            <input type="email" v-model="email" id="email" class="form-control" placeholder="Enter your email address">
                        </div>
                        <div class="form-group py-2">
                            <label for="password">Your Password</label>
                            <input type="password" v-model="password" id="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" v-model="remember" checked>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <div class="text-center">
                            <button type="button" class="uk-button-primary px-4 py-2" @click="attemptLogin()" :disabled="!loginIsValid">
                                <div class="uk-text-primary" v-if="isLoading">
                                    <span class="uk-margin-small-right">
                                        <img src="img/loader.svg" alt="Loader" width="22" height="22" data-uk-svg>
                                    </span>
                                </div>
                                <span v-else>Submit</span>
                            </button>

                            <p>Don't have any account? <a href="javascript:void(0)" @click="register()">Register Now</a></p>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            email: '',
            password: '',
            remember: true,
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

        attemptLogin(){
            this.isLoading = true;
            this.errors = [];

            axios.post('/login',{
               email: this.email,
               password: this.password,
               remember: this.remember
            }).then(res => {
               if(res.status == 200 && res.data.status == 'success'){
                   window.location.reload();
               }
            }).catch(error => {
                this.isLoading = false;

                if(error.response.status == 422){
                    this.errors.push(error.response.data.message);
                }
                else{
                    this.errors.push("Somthing went wrong. Please try again");
                }
            });
        },

        register(){
            location.href = '/register';
        }
    },

    computed: {
        loginIsValid(){
            return this.emailIsValid() && this.password && !this.isLoading;
        }
    }
}
</script>
<style scoped>

</style>