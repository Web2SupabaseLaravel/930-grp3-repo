import {BrowserRouter, Route, Routes} from 'react-router-dom';
import './App.css';
import Edit from './components/Edit';
import View from './components/view/View'
import Add from './components/add/Add';
import Delete from './components/Delete';
function App() {
  return (
  <BrowserRouter>
  <Routes>
    <Route  path='/view' index element={<View/>}  />
    <Route  path='/add'  element={<Add/>}   />
    <Route  path='/edit/:id'   element={<Edit/>} />
    <Route  path='/delete/:id'   element={<Delete/>} />
  </Routes>
  </BrowserRouter>
  );
}

export default App;
