import {
    createStackNavigator,
    createAppContainer
} from 'react-navigation'

import SplashScreen from '../SplashScreen/SplashScreen'
import Login from '../SignIn/Login'
import HomeScreen from '../Screens/HomeScreen'
import Cadastro from '../SignUp/Cadastro'
import Forgotten from '../RecoveryPass/Forgotten'

const AppNavigator = createStackNavigator(
    {
        SplashScreen,
        Login,
        HomeScreen,
        Cadastro,
        Forgotten,
    },

    {
        headerMode: 'none',
        navigationOptions: {
            headerVisible: false
        }
    }
)

export default createAppContainer(AppNavigator)
// const MenuConfig = {
//     initialRouteName: 'SplashScreen'
// }