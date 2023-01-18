import React, { Component } from 'react'
import {
    Alert,
    View,
    Text,
    TouchableOpacity,
    TextInput
} from 'react-native'
import { server, showError } from '../common'
import axios from 'axios'
import styles from './style'

export default class EditProfile extends Component {

    state = {
        name: null,
        password: '',
        confirmPassword: '',
        model: null,
        verify: null
    }

    _SaveName(name) {
        this.setState({ name })
    }

    _SavePassword(password) {
        this.setState({ password })
    }

    _SaveConfirmPassword(confirmPassword) {
        this.setState({ confirmPassword })
    }

    _SaveMotorcycle(model) {
        this.setState({ model })
    }

    _ADDMotorcycle = async () => {
        try {
            await axios.post(`${server}/motorcycles`, {
                model: this.state.model
            })
        } catch (err) {
            showError(err)
        }
    }
    
    _ChangeName = async () => {
        try {
            await axios.post(`${server}/changeName`, {
                name: this.state.name
            })
        } catch (err) {
            showError(err)
        }
    }

    _ChangePassword = async () => {
        if (this.state.password.trim() === this.state.confirmPassword.trim()) {
            if (this.state.password.length >= 6) {
                try {
                    await axios.post(`${server}/changePassword`, {
                        password: this.state.password
                    })
                } catch (err) {
                    showError(err)
                }
            } else {
                Alert.alert('Erro!', 'A senha teve conter pelo menos 6 dígitos!')
            }
        } else {
            Alert.alert('Erro!', 'Senhas diferentes!')
        }
    }

    _ChangeData = async () => {
        if (this.state.name || this.state.password || this.state.model) {
            if (this.state.name && this.state.name.trim()) {
                this._ChangeName()
                this.setState({ verify: 1 })
            }

            if (this.state.password && this.state.password.trim()) {
                this._ChangePassword()
                this.setState({ verify: 1 })
            }

            if (this.state.model && this.state.model.trim()) {
                this._ADDMotorcycle()
                this.setState({ verify: 1 })
            }

            if (this.state.verify) {
                Alert.alert('Sucesso!', 'Dados alterados!')
            }
        } else {
            Alert.alert('Aviso!', 'Nenhum dado foi inserido!')
        }
    }

    render() {
        return (
            <View style={styles.container}>

                <View style={styles.textView}>

                    <Text style={styles.textEdit}>Alterar dados</Text>

                </View>

                <View style={styles.edit}>
                    <TextInput
                        style={styles.input}
                        placeholder={'Alterar nome'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        onChangeText={(name) => this._SaveName(name)}
                    />

                </View>

                <View style={styles.edit}>
                    <TextInput
                        style={styles.input}
                        placeholder={'Alterar senha'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        onChangeText={(password) => this._SavePassword(password)}
                    />

                </View>

                <Text style={{color: 'rgba(255, 255, 255, 0.7)'}}>Senha: mínimo 6 caracteres</Text>

                <View style={[styles.edit, {marginTop: 5}]}>
                    <TextInput
                        style={styles.input}
                        placeholder={'Confirmar senha'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        onChangeText={(confirmPassword) => this._SaveConfirmPassword(confirmPassword)}
                    />

                </View>

                <View style={styles.edit}>
                    <TextInput
                        style={styles.input}
                        placeholder={'Adicionar moto'}
                        placeholderTextColor={'rgba(255, 255, 255, 0.7)'}
                        underlineColorAndroid='transparent'
                        onChangeText={(model) => this._SaveMotorcycle(model)}
                    />

                </View>

                <View style={styles.edit}>
                    <TouchableOpacity
                        style={styles.confirmButton}
                        onPress={() => this._ChangeData() }
                    >
                        <Text style={styles.text}>Salvar</Text>
                    </TouchableOpacity>

                </View>

            </View>
        )
    }
}