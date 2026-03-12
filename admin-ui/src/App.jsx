import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import Dashboard from "./pages/Dashboard";
import Bots from "./pages/Bots";
import Leads from "./pages/Leads";
import Analytics from "./pages/Analytics";
import Settings from "./pages/Settings";

import Sidebar from "./layout/Sidebar";
import Header from "./layout/Header";

export default function App() {

  return (

    <BrowserRouter>

      <div style={{display:"flex"}}>

        <Sidebar/>

        <div style={{flex:1}}>

          <Header/>

          <Routes>

            <Route path="/" element={<Dashboard/>}/>
            <Route path="/bots" element={<Bots/>}/>
            <Route path="/leads" element={<Leads/>}/>
            <Route path="/analytics" element={<Analytics/>}/>
            <Route path="/settings" element={<Settings/>}/>

          </Routes>

        </div>

      </div>

    </BrowserRouter>

  );

}