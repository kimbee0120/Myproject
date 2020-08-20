import React, {Component} from 'react';
import logo from './logo.svg';
import './App.css';
import axios from 'axios'

class App extends Component{
  state = {
    selectedFile: null,
    name: "Eunbi",
    jsonfd: {name: "Kim", bloodtype: "O"}
  }
  fileSelectedHandler = event =>
  {
    this.setState({
      selectedFile: event.target.files[0]
    })
  }
  fileIploadHandler = ()=>{
    const fd = new FormData();
    const product_id_list = JSON.stringify(['pid1234', 'pid1235']);
    const obj = {
      hello: "world"
    };

    const json = JSON.stringify(obj);
    fd.append("arr", product_id_list);
    fd.append("name", this.state.name);
     fd.append("jsonfd", JSON.stringify(this.state.jsonfd));
    fd.append('profilepic', this.state.selectedFile, this.state.selectedFile.name);


    
    axios.post('http://localhost:3003/auth/mtregister', fd, {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'multipart/form-data'
      }
      })
    .then(res => {
      console.log(res);
    })

  }

  render(){
    return (
      <div className="App">
        <input type="file" onChange={this.fileSelectedHandler}/>
        <button onClick={this.fileIploadHandler}>Upload</button>
      </div>
    );
  }
}

export default App;
