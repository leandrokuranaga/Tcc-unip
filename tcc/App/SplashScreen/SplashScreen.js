import React, { Component } from 'react'
import { View, Text, StyleSheet, Image } from 'react-native'

export default class SplashScreen extends Component {

    componentDidMount() {
        setTimeout(() => {
            this.load();
        }, 3000);
    }

    load = () => {
        this.props.navigation.push("Login");
    };

    render() {
        return (
            <View style={styles.container}>
                <Image source={require('./icon.png')}
                    styles={styles.image} />


            </View>
        )
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: "center",
        justifyContent: "center",
        backgroundColor: "#7F1221"
    },
    image: {
        height: 300,
        width: 300,
        resizeMode: "contain"
    }
})
