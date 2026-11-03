import React from 'react'
import { View, Text } from 'react-native'
import styles from './style'
import moment from 'moment'

export default props => {

    const date = moment(props.date).format('DD-MM-YY')

    return (
        <View style={styles.itensContainer}>
            <Text style={styles.title}>{props.id_moto}</Text>
            <Text style={styles.title}>{props.service}</Text>
            <Text style={styles.title}>{date}</Text>
        </View>
    )
}