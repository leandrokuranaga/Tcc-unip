import React, { Component } from 'react'
import {
	Text,
	View,
	TextInput,
	TouchableOpacity,
	Alert
} from 'react-native'

import styles from './style'
import { server, showError } from '../common'
import axios from 'axios'


export default class Forgotten extends Component {

	state = {
		email: null
	}

	_SaveEmail(email) {
		this.setState({ email })
	}

	_SendEmail = async () => {
		try {
			const mailer = await axios.post(`${server}/forgotPassword`, {
				email: this.state.email
			})
			
			if (mailer) {
				Alert.alert('Senha enviada!', 'Uma nova senha foi enviada para ' + this.state.email)
				this.props.navigation.navigate('Login')
			}
		} catch (err) {
			Alert.alert('Erro', 'Usuario não cadastrado!')
		}
	}

	render() {
		return (
			<View style={styles.container}>
					
				<View style={styles.textView}>

					<Text style={styles.text}>Insira seu endereço de e-mail para que possamos lhe enviar as instruções de recuperação de senha</Text>

				</View>

				<View style={styles.loginUser}>

					<TextInput
						style={styles.userInput}
						placeholder={'Insira o endereço de e-mail aqui'}
						placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
						underlineColorAndroid='transparent'
						keyboardType="ascii-capable"
						onChangeText={(email) => this._SaveEmail(email)}
					/>

				</View>

				<View style={styles.loginLinks}>
					<TouchableOpacity
						style={styles.button}
						onPress={() => this._SendEmail()}
					>
						<Text style={styles.color}>Continuar</Text>
					</TouchableOpacity>

					<TouchableOpacity style={styles.buttonCancel} onPress={() => this.props.navigation.navigate('Login')}>
						<Text style={styles.color}>Cancelar</Text>
					</TouchableOpacity>
				</View>

			</View>
		)
	}
}
