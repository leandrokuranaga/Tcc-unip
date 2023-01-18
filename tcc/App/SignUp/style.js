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
	cadastro: {
		fontFamily: 'notoserif',
		color: 'white',
		fontSize: 30
	},
	LoginUser: {
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
		textAlign: 'center'
	},
	IconEye: {
		position: 'absolute',
		marginLeft: '73%'
	},
	loginLinks: {
		justifyContent: 'center',
		alignItems: 'center'
	},
	account: {
		fontSize: 18,
		color: 'white',
		fontWeight: '500',
		alignItems: 'center',
		fontSize: 16,
		textAlign: 'center',
		textDecorationLine: 'underline',
		marginTop: 10
	},
	signIn: {
		fontSize: 18,
		color: 'white',
		fontWeight: '500',
		alignItems: 'center',
		fontSize: 16,
		textAlign: 'center',
		textDecorationLine: 'underline',
		marginTop: 10
	},
	button: {
		marginTop: 20,
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
		borderRadius: 25
	},
	create: {
		color: 'yellow',
		textAlign: 'center',
		alignItems: 'center',
		borderColor: 'rgb(0, 0, 0)',
	}



})

export default styles