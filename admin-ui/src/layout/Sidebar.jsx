import React from "react";
import { Link } from "react-router-dom";

export default function Sidebar(){

return(

<div style={{
width:"220px",
background:"#111",
color:"#fff",
height:"100vh",
padding:"20px"
}}>

<h2>LeadyIA</h2>

<nav>

<p><Link to="/">Dashboard</Link></p>
<p><Link to="/bots">Bots</Link></p>
<p><Link to="/leads">Leads</Link></p>
<p><Link to="/analytics">Analytics</Link></p>
<p><Link to="/settings">Settings</Link></p>

</nav>

</div>

)

}