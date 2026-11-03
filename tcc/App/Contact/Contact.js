import React, { Component } from 'react';
import { View, WebView }from 'react-native';

export default class Budget extends Component {
    render() {

        console.disableYellowBox = true

        return (
            <View style={{ height: '100%', width: '100%', overflow:'hidden' }}>
                <WebView source={{ uri: "https://www.facebook.com/mx7racingteam/?ref=br_rs" }} />
            </View>
        )
    }
}