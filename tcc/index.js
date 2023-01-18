/**
 * @format
 */
import { AppRegistry } from 'react-native';
import AppNavigator from './App/Routes/routes';
import { name as appName } from './app.json';

AppRegistry.registerComponent(appName, () => AppNavigator);
