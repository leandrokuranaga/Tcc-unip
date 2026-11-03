import React, { Component } from 'react'
import {
	Text,
	TextInput,
	View,
	TouchableOpacity,
	Alert
} from 'react-native'

import axios from 'axios'
import { server } from '../common'
import Icon from 'react-native-vector-icons/FontAwesome5';
import OneSignal from 'react-native-onesignal'
import styles from './style.js'

//import LoginButton from 'react-native-fbsdk';
//import ImageBackground from './Images/bgImage.jpg'
//import logo from './images/logo/jpg'

export default class Login extends Component {

	state = {
		secure: true,
		email: null,
		password: null
	}

	componentDidMount() {
		OneSignal.init("e2946387-8160-40fc-8524-e443ea5ba97f")
		OneSignal.addEventListener('received', this.receivedPush)
		OneSignal.addEventListener('opened', this.openedPush)
		OneSignal.addEventListener('ids', this.idsPush)
	}

	receivedPush(push) {
		console.log(`Received Push: ${push}`)
	}

	openedPush(push) {
		console.log(`Opened Push: ${push}`)
	}

	idsPush(push) {
		console.log(`IDS Push: ${push}`)
	}

	_ChangeSecure() {
		this.setState({ secure: !this.state.secure })
	}

	_SaveEmail(email) {
        this.setState({ email })
    }

    _SavePassword(password) {
        this.setState({ password })
    }

	_SignIn = async () => {
		try {
            const res = await axios.post(`${server}/signin`, {
                email: this.state.email,
                password: this.state.password
            })

            axios.defaults.headers.common['Authorization'] = `bearer ${res.data.token}`
			this.props.navigation.navigate('HomeScreen')
		} catch (err) {
            Alert.alert('Erro', 'Usuário e senha incorretos!')
        }
	}

	render() {
		return (

			<View style={styles.container}>

				<Text style={styles.welcome}>Bem-vindo a MX7</Text>

				<View style={styles.loginUser}>

					<Icon name='user' size={28} color='rgba(255, 255, 255, 0.7)'
						style={styles.inputIcon} />

					<TextInput
						style={styles.userInput}
						placeholder={'Email'}
						placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
						underlineColorAndroid='transparent'
						keyboardType="email-address"
						onChangeText={(email) => this._SaveEmail(email)}
					/>

				</View>

				<View style={styles.loginUser}>

					<Icon name='lock' size={26} color='rgba(255, 255, 255, 0.7)'
						style={styles.inputIcon} />

					<TextInput
						style={styles.userInput}
						type='password'
						placeholder={'Senha'}
						placeholderTextColor={'rgba(255,255,255,0.7)'}
						underlineColorAndroid='transparent'
						secureTextEntry={this.state.secure}
						onChangeText={(password) => this._SavePassword(password)}
					/>

					<Icon style={styles.IconEye}
						name={this.state.secure ? 'eye' : 'eye-slash'}
						size={26}
						color='rgba(255, 255, 255, 0.7)'
						onPress={() => this._ChangeSecure()}
					/>
				</View>

				<View style={styles.loginLinks}>

					<TouchableOpacity style={styles.button}
						onPress={() => this._SignIn()}>
						<Text style={styles.signIn}>Entrar</Text>
					</TouchableOpacity>

					<Text style={styles.signUpText}>ou</Text>
					<TouchableOpacity style={styles.create}
						onPress={() => this.props.navigation.navigate('Cadastro')}>
						<Text style={styles.create}>Crie uma conta</Text>
					</TouchableOpacity>

					<TouchableOpacity style={styles.passForg}
						onPress={() => this.props.navigation.navigate('Forgotten')}>
						<Text style={styles.textForg}>Esqueci minha senha</Text>
					</TouchableOpacity>

				</View>

			</View>
		)
	}
}