import { StyleSheet } from 'react-native'

const styles = StyleSheet.create({
    container: {
        justifyContent: 'center',
        alignItems: 'center',
        borderWidth: 1,
        backgroundColor: '#7F1221',
        flex: 1
    },
    textView: {
        width: '80%',
        marginTop: '20%',
        alignItems: 'center'
    },
    textEdit: {
        fontFamily: 'notoserif',
        color: 'yellow',
        fontSize: 30,
        marginTop: 30
    },
    edit: {
        flexDirection: 'row',
        justifyContent: 'center',
        alignItems: 'center',
        marginTop: 18,
    },
    confirmButton: {
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
    input: {
        borderRadius: 25,
        width: '80%',
        height: 45,
        fontSize: 16,
        marginLeft: 10,
        marginRight: 10,
        backgroundColor: 'rgba(0, 0, 0, 0.35)',
        color: 'rgba(255, 255, 255, 0.7)',
        textAlign: 'center',
    },
    text: {
        justifyContent: 'center',
        alignItems: 'center',
        color: 'yellow'
    },
    cancelBtn: {
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
})

export default styles