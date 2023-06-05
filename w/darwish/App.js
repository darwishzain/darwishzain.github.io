import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';

export default function App() {
  console.log("App Executed");
  return (
    <View style={styles.container}>
      <header>Darwish Mat Zain</header>
      <button>Start</button>
      <Text>Open up App.js to start working on your app!</Text>
      <Text>Darwish Mat Zain</Text>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f0f0f0',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
