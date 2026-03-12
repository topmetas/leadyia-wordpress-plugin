import React,{useEffect,useState} from "react";
import api from "../api/api";

export default function Dashboard(){

const [stats,setStats] = useState(null)

useEffect(()=>{

api.get("/analytics/overview")
.then(res=>setStats(res.data))

},[])

if(!stats) return <p>Loading...</p>

return(

<div>

<h1>Analytics</h1>

<p>Conversas: {stats.conversations}</p>
<p>Mensagens: {stats.messages}</p>
<p>Leads: {stats.leads}</p>

</div>

)

}