import {
    StyleSheet,
} from 'react-native'

const styles = StyleSheet.create({

    container: {
        flex: 1,
        backgroundColor: '#7F1221',
        justifyContent: 'center',
        alignItems: 'center'
    },
    text: {
        fontFamily: 'notoserif',
        color: 'white',
        fontSize: 30,
        marginTop: 20
    },
    textView: {
        width: '80%',
        marginTop: '20%',
    },
    loginUser: {
        flexDirection: 'row',
        alignItems: 'center',
        marginTop: 20
    },
    userInput: {
        backgroundColor: 'rgba(0, 0, 0, 0.35)',
        borderRadius: 25,
        width: '80%',
        height: 45,
        color: 'rgba(255, 255, 255, 0.7)',
        fontSize: 16,
        marginHorizontal: 25,
        textAlign: 'center',
        marginTop: 20
    },
    loginLinks: {
        flexDirection: 'row',
        justifyContent: 'center',
        alignItems: 'center',
        marginTop: 30
    },
    button: {
        borderWidth: 1,
        backgroundColor: '#00008b',
        width: '40%',
        color: 'yellow',
        paddingLeft: 35,
        paddingRight: 35,
        paddingTop: 10,
        paddingBottom: 10,
        borderColor: '#00008b',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 25,
        marginBottom: '40%',
        marginRight: 5,
        marginTop: 20
    },
    buttonCancel: {
        borderWidth: 1,
        backgroundColor: 'red',
        width: '40%',
        color: 'white',
        paddingLeft: 35,
        paddingRight: 35,
        paddingTop: 10,
        paddingBottom: 10,
        borderColor: 'red',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 25,
        marginBottom: '40%',
        marginLeft: 5,
        marginTop: 20
    },
    color: {
        color: 'yellow'
    }
})

export default styles