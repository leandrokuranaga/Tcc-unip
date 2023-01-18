import React, { Component } from 'react'

import {
    View,
    Text,
    TouchableOpacity,
    Alert
} from 'react-native'

import Historic from '../Historic/Historic'
import Budget from '../Budget/Budget'
import EditProfile from '../EditProfile/EditProfile'
import Contact from '../Contact/Contact'
import Icon from 'react-native-vector-icons/FontAwesome5'
import { server, showError } from '../common'
import axios from 'axios'
import styles from './style'

export default class HomeScreen extends Component {

    state = {
        view: (<Historic />),
        color: 'red'
    }

    _SelectView(number) {
        let view = null
        if (number === 1) {
            view = (<Historic />)
        } else if (number === 2) {
            view = (<Budget />)
        } else if (number === 3) {
            view = (<EditProfile />)
        } else if (number === 4) {
            view = (<Contact />)
        }
        this.setState({ view })
    }

    componentDidMount = async () => {
        this._LoadMotorcycles()
    }

    _LoadMotorcycles = async () => {
        try {
            const res = await axios.get(`${server}/motorcycles`)

            if (res.data) {
                this.setState({ color: 'green' })
            }

        } catch (err) {
            showError(err)
        }
    }

    render() {
        return (
            <View style={styles.container}>

                <View style={styles.status}>
                    <Text style={styles.statusText}>Status de manutenção: </Text>
                    <Icon name='check-circle' size={26} color={this.state.color} />
                </View>
                
                <View style={styles.content}>
                    {this.state.view}
                </View>

                <View style={styles.iconsView}>

                    <TouchableOpacity style={styles.icon} onPress={() => this._SelectView(1)}>
                        <Icon name='history' size={26} color='rgba(255, 255, 255, 0.7)' />
                    </TouchableOpacity>

                    <TouchableOpacity style={styles.icon} onPress={() => this._SelectView(2)}>
                        <Icon name='file-invoice-dollar' size={26} color='rgba(255, 255, 255, 0.7)' />
                    </TouchableOpacity>

                    <TouchableOpacity style={styles.icon} onPress={() => this._SelectView(3)}>
                        <Icon name='user-edit' size={26} color='rgba(255, 255, 255, 0.7)' />
                    </TouchableOpacity>

                    <TouchableOpacity style={styles.icon} onPress={() => this._SelectView(4)}>
                        <Icon name='comment' size={26} color='rgba(255, 255, 255, 0.7)' />
                    </TouchableOpacity>

                </View>

            </View>
        )
    }
}