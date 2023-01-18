import React, { Component } from 'react'
import {
    Text,
    View,
    TextInput,
    TouchableOpacity,
    Alert
} from 'react-native'

import styles from './style.js'
import Icon from 'react-native-vector-icons/FontAwesome5';
import axios from 'axios';
import { server, showError } from '../common'

export default class Cadastro extends Component {

    state = {
        name: null,
        email: null,
        secure: true,
        password: null,
        confirmPassword: null
    }

    _ChangeSecure() {
        this.setState({ secure: !this.state.secure })
    }

    _SaveName(name){
        this.setState({ name })
    }

    _SaveEmail(email) {
        this.setState({ email })
    }

    _SavePassword(password) {
        this.setState({ password })
    }

    _SaveConfirmation(confirmPassword) {
        this.setState({ confirmPassword })
    }

    _Authentication() {
        const validations = []

        validations.push(this.state.name && this.state.name.trim())
        validations.push(this.state.email && this.state.email.includes('@'))
        validations.push(this.state.password && this.state.password.trim() && this.state.password.length >=6)
        validations.push(this.state.password === this.state.confirmPassword)

        const validForm = validations.reduce((all, v) => all && v)

        return validForm
    }

    _SignUp = async () => {
        const auth = this._Authentication()
        if ((this.state.password === this.state.confirmPassword) && auth) {
            try {
                await axios.post(`${server}/signup`, {
                    name: this.state.name,
                    email: this.state.email,
                    password: this.state.password
                })

                Alert.alert('Sucesso!', 'Usuário cadastrado =)')
                this.props.navigation.navigate('Login')
            } catch (err) {
                showError(err)
            }
        } else {
            Alert.alert('Erro!', 'Insira os dados corretamente, a senha deve ter no mínimo 6 dígitos!')
        }
    }

    render() {
        return (
            <View style={styles.container}>

                <Text style={styles.cadastro}>Cadastre-se</Text>

                <View style={styles.LoginUser}>

                    <TextInput
                        style={styles.userInput}
                        placeholder={'Nome'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        keyboardType="ascii-capable"
                        onChangeText={(name) => this._SaveName(name)}
                    />

                </View>

                <View style={styles.LoginUser}>
                    <TextInput
                        style={styles.userInput}
                        placeholder={'Email'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        keyboardType="email-address"
                        onChangeText={(email) => this._SaveEmail(email)}
                    />
                </View>

                <View style={styles.LoginUser}>
                    <TextInput
                        style={styles.userInput}
                        type='password'
                        placeholder={'Senha'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        secureTextEntry={this.state.secure}
                        onChangeText={password => this._SavePassword(password)}
                    />

                    <Icon style={styles.IconEye}
                        name={this.state.secure ? 'eye' : 'eye-slash'}
                        size={26}
                        color='rgba(255, 255, 255, 0.7)'
                        onPress={() => this._ChangeSecure()}
                    />
                </View>

                <Text style={{color: 'rgba(255, 255, 255, 0.7)'}}>Senha: mínimo 6 caracteres</Text>

                <View style={[styles.LoginUser, {marginTop: 6}]}>
                    <TextInput
                        style={styles.userInput}
                        type='password'
                        placeholder={'Confirme a Senha'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        secureTextEntry={this.state.secure}
                        onChangeText={confirmPassword => this._SaveConfirmation(confirmPassword)}
                    />

                    <Icon style={styles.IconEye}
                        name={this.state.secure ? 'eye' : 'eye-slash'}
                        size={26}
                        color='rgba(255, 255, 255, 0.7)'
                        onPress={() => this._ChangeSecure()}
                    />
                </View>
                <View>
                    <TouchableOpacity style={styles.button}
                        onPress={() => this._SignUp()}>
                        <Text style={styles.create}>Criar conta</Text>
                    </TouchableOpacity>

                </View>

                <View style={styles.loginLinks}>

                    <TouchableOpacity style={styles.account}
                        onPress={() => this.props.navigation.navigate('Login')}>
                        <Text style={styles.signIn} >Já tem uma conta? Entrar</Text>
                    </TouchableOpacity>
                </View>

            </View>
        )
    }
}
