// import logo from "./logo.svg";
import "./App.css";
import Exemple from "./components/Exemple";
import Footer from "./components/Footer";
import Form from "./components/Form";
import HeaderSite from "./components/HeaderSite.jsx";

function App() {
  return (
    <div className="App">
      <HeaderSite name="jc site" />
      <Form />
      <Exemple />
      <Footer />
    </div>
  );
}

export default App;
