package com.example.upsaalert;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.upsaalert.model.CommentAdapter;
import com.example.upsaalert.model.Comments;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.mikhaellopez.circularimageview.CircularImageView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class CommentsView extends AppCompatActivity {
    private RecyclerView recyclerView;
    private RecyclerView.Adapter adapter;
    private List<Comments> listItems;
    private RequestQueue mRequestQueue;
    private StringRequest mStringRequest;
    private CircularImageView imgs;
    private TextView title,dates,location,call,hosted,evntdsec,eventtimme,hiden;
    private EditText comnbox;
    private Button combtn;
    private String getevents = "http://192.168.43.141/AndroidPhp/getEventss.php";
    private String urls = "http://192.168.43.141/AndroidPhp/getComments.php";
    private FloatingActionButton floting;
    private ProgressBar progressBar;
    FirebaseAuth mAuth;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_comments);
        if (android.os.Build.VERSION.SDK_INT > 9)
        {
            StrictMode.ThreadPolicy policy = new
                    StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        floting = (FloatingActionButton) findViewById(R.id.fab);
        progressBar = (ProgressBar) findViewById(R.id.progressBar7);
        floting.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String cid = getIntent().getStringExtra("eventid");
                Intent intent = new Intent(CommentsView.this,AddComment.class);
                intent.putExtra("commtid",cid);
                startActivity(intent);
            }
        });
        hiden = (TextView) findViewById(R.id.comhuiden);
        recyclerView = (RecyclerView) findViewById(R.id.recycleviewws);
        listItems = new ArrayList<>();
        loadDataCategory(getIntent().getStringExtra("eventid"));
        progressBar.setVisibility(View.VISIBLE);
    }

    private void loadDataCategory(final String eventid) {
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("Comments");
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                listItems.clear();
                for (DataSnapshot snapshot: dataSnapshot.getChildren()){
                    Comments comments = snapshot.getValue(Comments.class);
                    if (comments.getEventid().matches(eventid)){
                        progressBar.setVisibility(View.INVISIBLE);
                        String Eventid = comments.getEventid();
                        String fullname =  comments.getFullname();
                        String commnt = comments.getCmsg();
                        String comdate = comments.getCommentdate();
                        String imgs = comments.getImages();
                        com.example.upsaalert.model.Comments item = new com.example.upsaalert.model.Comments(Eventid,fullname,commnt,comdate,imgs);
                        listItems.add(item);
                    }
                }

                adapter = new CommentAdapter(listItems,getApplicationContext());
                recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                recyclerView.setAdapter(adapter);

                if (listItems.isEmpty()){
                    recyclerView.setVisibility(View.GONE);
                    hiden.setVisibility(View.VISIBLE);
                    progressBar.setVisibility(View.INVISIBLE);
                }else{
                    recyclerView.setVisibility(View.VISIBLE);
                    hiden.setVisibility(View.GONE);
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }




  /*  private void loadDataCategory(final String eventid) {
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.POST, urls, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(response.matches("failed")){
                    Toast.makeText(CommentsView.this, "Serial Number one or Product Dont Exit", Toast.LENGTH_SHORT).show();
                }else{
                    try {
                        JSONArray array = new JSONArray(response);
                        for(int i=0; i<array.length(); i++){
                            JSONObject obj = array.getJSONObject(i);
                            String Eventid = obj.getString("Eventid");
                            String fullname =  obj.getString("Fullname");
                            String commnt = obj.getString("Cmsg");
                            String comdate = obj.getString("Commentdate");
                            String imgs = obj.getString("images");
                            com.example.upsaalert.model.Comments item = new com.example.upsaalert.model.Comments(Eventid,fullname,commnt,comdate,imgs);
                            listItems.add(item);
                        }

                        adapter = new CommentAdapter(listItems,getApplicationContext());
                        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                        //recyclerView.setLayoutManager(new GridLayoutManager(getApplicationContext(),2));
                        recyclerView.setAdapter(adapter);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(CommentsView.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("eventid",eventid);
                // params.put("email",email);
                return params;
            }

        };

        mRequestQueue.add(mStringRequest);
    }
*/





}
