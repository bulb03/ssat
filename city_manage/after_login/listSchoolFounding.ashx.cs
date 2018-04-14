using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Newtonsoft.Json;
using Model;
using System.Data;
using System.Web.SessionState;

namespace work.API.country
{
    /// <summary>
    /// listSchoolFounding1 的摘要描述
    /// </summary>
    public class listSchoolFounding1 : IHttpHandler, IRequiresSessionState
    {

        public void ProcessRequest(HttpContext context)
        {
            context.Response.ContentType = "application/json";

            try
            {
                context.Response.StatusCode = 200;
                SCHOOL schoolModel = new SCHOOL();
                int year = (context.Request.QueryString["year"] == null) ? Helper.Utils.currentSchoolYear() : Convert.ToInt32(context.Request.QueryString["year"]);
                string country = context.Session["country_name"].ToString(); //context.Session["country"].ToString();
                DataTable schoolList = schoolModel.listFundingByCountry(country, year, context.Request.QueryString["isNew"]);
                //Helper.Utils.printDataTable(schoolList);
                System.Diagnostics.Debug.WriteLine("ound");
                context.Response.Write(JsonConvert.SerializeObject(schoolList, Formatting.Indented));
            }
            catch (Exception e)
            {
                //List<Item> ItemList = new List<Item>();
                //ItemList.Add(new Item { ID = id, Name = name, Value = value });
                context.Response.StatusCode = 500;
                context.Response.Write(JsonConvert.SerializeObject((new ErrorResponse { msg = e.Message, trace = e.StackTrace }), Formatting.Indented));
            }
        }

        public bool IsReusable
        {
            get
            {
                return false;
            }
        }

        public class ErrorResponse
        {
            public string type = "Error";
            public string msg;
            public string trace;
        }
    }
}