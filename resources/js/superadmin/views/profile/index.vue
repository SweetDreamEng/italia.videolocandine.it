<template>
	<v-container fluid>
		<v-card>
			<v-card-title>
			<span class="headline">Change Password</span>
			</v-card-title>
			<v-card-text>
				<v-form ref="form" v-model="valid" lazy-validation>
				<v-container grid-list-md>
					<v-layout wrap>
							<v-flex md12>
								<v-text-field type="password" v-model="userForm.password" :label="$t('users.fields.new_password')" :rules="passwordRules"></v-text-field>
							</v-flex>
							<v-flex md12>
								<v-text-field type="password" v-model="userForm.password_confirmation" :label="$t('users.fields.password_confirm')" :rules="confirmRules"></v-text-field>
							</v-flex>
					</v-layout>
				</v-container>
						</v-form>
			</v-card-text>
			<v-card-actions>
				<v-container>
					<v-btn color="success" dark @click="save">{{ $t('buttons.save') }}</v-btn>
				</v-container>
			</v-card-actions>
		</v-card>
	</v-container>
</template>

<script>
	import { settings } from '../../settings.js'
  	export default {
  		data () {
			return {
				valid: true,
				userForm: {
					password: '',
					password_confirmation: '',
				},

				passwordRules: [
			        v => !!v || 'Password is required',
			    ],
			    confirmRules: [
			    	v => !!v || 'Confirm is required',
			        v => (!!v && v) === this.userForm.password || 'Password does not match'
			    ],
			}
		},
	    methods: {
			save () {
				if (this.$refs.form.validate()) {
					let userForm = new FormData();
	                userForm.append('password', this.userForm.password);
	                userForm.append('password_confirmation', this.userForm.password_confirmation);
	                axios.post(settings.root_url + '/api/super-admin-141592/change-password', userForm)
	                .then(response =>  {
	                	console.log('success');
	                }).catch(error => {
	                });
	            }
			},
	    }
  	}
</script>